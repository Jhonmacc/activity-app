<template>
  <div class="relative max-w-4xl mx-auto mt-10 p-5 border rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Orçamento Familiar</h1>

    <form @submit.prevent="addCategory" class="mb-6">
      <div class="mb-4">
        <label class="block text-sm font-medium mb-1" for="categoryName">Nome da Categoria</label>
        <input v-model="newCategory.name" id="categoryName" class="w-full border rounded p-2" type="text" required />
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium mb-1" for="categoryValue">Valor</label>
        <input v-model="newCategory.value" id="categoryValue" class="w-full border rounded p-2" type="number" required />
      </div>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Adicionar Categoria</button>
    </form>

    <div ref="echartsContainer" style="height: 500px;"></div>

    <div v-if="actionMenuVisible" :style="actionMenuPosition" class="absolute bg-white shadow-lg p-4 rounded" ref="actionMenuRef">
      <ul>
        <li><button @click="openColorPicker" class="block bg-yellow-500 text-white px-4 py-2 rounded mb-2">Editar Cor</button></li>
        <li><button @click="openValueEditor" class="block bg-blue-500 text-white px-4 py-2 rounded mb-2">Editar Valor</button></li>
        <li><button @click="deleteCategory" class="block bg-red-500 text-white px-4 py-2 rounded">Excluir</button></li>
      </ul>
    </div>


    <div v-if="showColorPicker" class="fixed inset-0 flex items-center justify-center z-50">
      <div class="bg-white p-4 rounded shadow-lg">
        <Vue3ColorPicker v-model="selectedColor" mode="solid" :showColorList="false" :showEyeDrop="false" type="RGBA"/>
        <button @click="saveColor" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Ok</button>
      </div>
    </div>

    <div v-if="showValueEditor" class="fixed inset-0 flex items-center justify-center z-50">
      <div class="bg-white p-4 rounded shadow-lg">
        <input v-model="updatedValue" type="number" class="border rounded p-2" />
        <button @click="saveValue" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Salvar</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Vue3ColorPicker } from '@cyhnkckali/vue3-color-picker';
import axios from 'axios';
import * as echarts from 'echarts';

const echartsContainer = ref(null); 
const actionMenuRef = ref(null); 
const treemapData = ref([]);
const newCategory = ref({
  name: '',
  value: null
});
const actionMenuVisible = ref(false);
const showColorPicker = ref(false);
const showValueEditor = ref(false);
const selectedColor = ref('#ffffff');
const updatedValue = ref(null);
const selectedCategoryId = ref(null);
const actionMenuPosition = ref({ top: '0px', left: '0px' });

const fetchTreemapData = () => {
  axios.get('http://localhost:8000/api/categories')
    .then(response => {
      treemapData.value = response.data;
      createTreeMap();
    })
    .catch(error => {
      console.error('Erro ao buscar os dados do Treemap:', error);
    });
};

const createTreeMap = () => {
  if (echartsContainer.value) {
    const chart = echarts.init(echartsContainer.value);

    const option = {
      series: {
        type: 'treemap',
        data: treemapData.value.map(category => ({
          ...category,
          itemStyle: {
            color: category.color
          }
        })),
        label: {
          show: true,
          formatter: '{b}'
        },
        itemStyle: {
          borderColor: '#fff',
          borderWidth: 1
        },
        tooltip: {
          trigger: 'item',
          formatter: '{b}<br/>{c}'
        }
      }
    };

    chart.setOption(option);

    chart.on('click', (params) => {
      if (params.componentType === 'series') {
        selectedCategoryId.value = params.data.id;
        showActionMenu(params.event.event);
      }
    });
  } else {
    console.error('Elemento do gráfico não encontrado');
  }
};

const showActionMenu = (event) => {
  actionMenuVisible.value = true;
  actionMenuPosition.value = {
    top: `${event.clientY}px`,
    left: `${event.clientX}px`
  };
  event.stopPropagation();
};

const openColorPicker = () => {
  showColorPicker.value = true;
  showValueEditor.value = false; 
  actionMenuVisible.value = false; 
};

const openValueEditor = () => {
  const selectedCategory = treemapData.value.find(category => category.id === selectedCategoryId.value);
  if (selectedCategory) {
    updatedValue.value = selectedCategory.value; 
  }
  showValueEditor.value = true;
  showColorPicker.value = false; 
  actionMenuVisible.value = false; 
};

const saveColor = () => {
  axios.put(`http://localhost:8000/api/categories/${selectedCategoryId.value}`, {
    color: selectedColor.value
  })
  .then(() => {
    fetchTreemapData(); 
    showColorPicker.value = false;
  })
  .catch(error => {
    console.error('Erro ao atualizar a cor:', error);
  });
};

const saveValue = () => {
  axios.put(`http://localhost:8000/api/categories/${selectedCategoryId.value}`, {
    value: updatedValue.value
  })
  .then(() => {
    fetchTreemapData(); 
    showValueEditor.value = false;
  })
  .catch(error => {
    console.error('Erro ao atualizar o valor:', error);
  });
};

const deleteCategory = () => {
  axios.delete(`http://localhost:8000/api/categories/${selectedCategoryId.value}`)
  .then(() => {
    fetchTreemapData(); 
    actionMenuVisible.value = false;
  })
  .catch(error => {
    console.error('Erro ao excluir a categoria:', error);
  });
};

const addCategory = () => {
  const newEntry = {
    name: newCategory.value.name,
    value: parseFloat(newCategory.value.value)
  };

  axios.post('http://localhost:8000/api/categories', newEntry)
    .then(() => {
      fetchTreemapData();
      resetForm();
    })
    .catch(error => {
      console.error('Erro ao adicionar nova categoria:', error);
    });
};

const resetForm = () => {
  newCategory.value.name = '';
  newCategory.value.value = null;
};

const handleClickOutside = (event) => {
  const actionMenuElement = actionMenuRef.value;
  if (actionMenuElement && !actionMenuElement.contains(event.target)) {
    actionMenuVisible.value = false;
  }
};

onMounted(() => {
  fetchTreemapData();
  document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside);
});
</script>

<style>
.action-menu {
  position: absolute;
  background-color: white;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  padding: 1rem;
  z-index: 1000;
}

.action-menu ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.action-menu li {
  margin-bottom: 0.5rem;
}

.action-menu button {
  display: block;
  width: 100%;
}

.fixed {
  position: fixed;
}

.inset-0 {
  inset: 0;
}
</style>
