<template>
  <div class="relative max-w-4xl mx-auto mt-10 p-5 border rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Orçamento Familiar</h1>

    <form @submit.prevent="addCategory">
      <div class="mb-4">
        <label class="block text-sm font-medium mb-1" for="categoryName">Nome da Categoria</label>
        <input v-model="newCategory.name" id="categoryName" class="w-full border rounded p-2" type="text" required />
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium mb-1" for="categoryValue">Valor</label>
        <input v-model="newCategory.value" id="categoryValue" class="w-full border rounded p-2" type="number"
          required />
      </div>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Adicionar Categoria</button>
    </form>
  </div>

  <div id="treemap" class="treemap relative max-w-4xl mx-auto mt-10 p-5 border rounded-lg">
    <div v-for="category in treemapData" :key="category.id" :style="getStyle(category)" class="treemap-item"
      @click.stop="selectCategory(category.id, $event)">
      {{ category.name }}: {{ category.value }}
    </div>
  </div>

  <div v-if="actionMenuVisible" :style="actionMenuPosition" class="action-menu absolute bg-white shadow-lg p-4 rounded"
    ref="actionMenuRef">
    <button @click="showEditField" class="block bg-yellow-500 text-white px-4 py-2 rounded mb-2">Editar Valor</button>
    <button @click="showColorPicker" class="block bg-blue-500 text-white px-4 py-2 rounded mb-2">Editar Cor</button>
    <button @click="deleteCategory" class="block bg-red-500 text-white px-4 py-2 rounded mb-2">Excluir</button>
  </div>

  <div v-if="colorPickerVisible" class="color-picker fixed inset-0 flex items-center justify-center z-50">
    <div class="bg-white p-4 rounded shadow-lg">
      <label for="colorPicker" class="block text-sm font-medium mb-2">Escolha a Cor</label>
      <input type="color" id="colorPicker" v-model="selectedColor" class="w-full">
      <button @click="confirmColorChange" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Ok</button>
      <button @click="hideColorPicker" class="bg-gray-500 text-white px-4 py-2 rounded mt-2">Fechar</button>
    </div>
  </div>

  <div v-if="editFieldVisible" class="edit-field fixed inset-0 flex items-center justify-center z-50">
    <div class="bg-white p-4 rounded shadow-lg">
      <input v-model="editCategoryValue" type="number" class="border rounded p-2" placeholder="Novo Valor" />
      <button @click="updateCategory" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Salvar</button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const colorPickerVisible = ref(false);
const selectedColor = ref('#000000');
const treemapData = ref([]);
const newCategory = ref({ name: '', value: 0 });
const actionMenuVisible = ref(false);
const actionMenuPosition = ref({ top: '0px', left: '0px' });
const selectedCategoryId = ref(null);
const editFieldVisible = ref(false);
const editCategoryValue = ref(0);
const actionMenuRef = ref(null);

const fetchTreemapData = () => {
  fetch('http://localhost:8000/api/categories')
    .then(response => response.json())
    .then(data => {
      treemapData.value = data.sort((a, b) => b.value - a.value);
    })
    .catch(error => {
      console.error('Erro ao buscar os dados do Treemap:', error);
    });
};

const addCategory = () => {
  const newEntry = {
    name: newCategory.value.name,
    value: parseFloat(newCategory.value.value),
    color: `#${Math.floor(Math.random() * 16777215).toString(16)}`
  };

  fetch('http://localhost:8000/api/categories', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    },
    body: JSON.stringify(newEntry)
  })
    .then(response => response.json())
    .then(() => {
      fetchTreemapData();
      resetForm();
    })
    .catch(error => {
      console.error('Erro ao adicionar nova categoria:', error);
    });
};

const updateColor = () => {
  fetch(`http://localhost:8000/api/categories/${selectedCategoryId.value}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    },
    body: JSON.stringify({ color: selectedColor.value })
  })
    .then(response => response.json())
    .then(() => {
      fetchTreemapData();
      colorPickerVisible.value = false;
    })
    .catch(error => {
      console.error('Erro ao atualizar a cor da categoria:', error);
    });
};

const confirmColorChange = () => {
  updateColor();
};

const getStyle = (category) => {
  const totalValue = treemapData.value.reduce((sum, item) => sum + item.value, 0);
  const sizeRatio = (category.value / totalValue);

  const minWidth = Math.max(150, category.name.length * 10);
  const minHeight = Math.max(50, 20);

  return {
    backgroundColor: category.color,
    width: `${sizeRatio * 100}vw`,
    height: `${sizeRatio * 100}vh`,
    minWidth: `${minWidth}px`,
    minHeight: `${minHeight}px`,
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'center',
    overflow: 'hidden',
    textOverflow: 'ellipsis',
    boxSizing: 'border-box'
  };
};

const showColorPicker = () => {
  const selectedCategory = treemapData.value.find(category => category.id === selectedCategoryId.value);
  selectedColor.value = selectedCategory.color;
  colorPickerVisible.value = true;
  actionMenuVisible.value = false;
};

const hideColorPicker = () => {
  colorPickerVisible.value = false;
};

const selectCategory = (id, event) => {
  selectedCategoryId.value = id;
  actionMenuPosition.value = {
    top: `${event.clientY}px`,
    left: `${event.clientX}px`
  };
  actionMenuVisible.value = true;
};

const showEditField = () => {
  const selectedCategory = treemapData.value.find(category => category.id === selectedCategoryId.value);
  editCategoryValue.value = selectedCategory.value;
  editFieldVisible.value = true;
  actionMenuVisible.value = false;
};

const updateCategory = () => {
  fetch(`http://localhost:8000/api/categories/${selectedCategoryId.value}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    },
    body: JSON.stringify({ value: parseFloat(editCategoryValue.value) })
  })
    .then(response => response.json())
    .then(() => {
      fetchTreemapData();
      editFieldVisible.value = false;
    })
    .catch(error => {
      console.error('Erro ao atualizar a categoria:', error);
    });
};

const deleteCategory = () => {
  fetch(`http://localhost:8000/api/categories/${selectedCategoryId.value}`, {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    }
  })
    .then(() => {
      fetchTreemapData();
      actionMenuVisible.value = false;
    })
    .catch(error => {
      console.error('Erro ao excluir a categoria:', error);
    });
};

onMounted(() => {
  fetchTreemapData();
  document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside);
});

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
</script>
<style>
.treemap {
  display: flex;
  flex-wrap: wrap;
  margin: -1px;
  overflow: hidden;
  position: relative;
  margin-bottom: 20px;
}

.treemap-item {
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-weight: bold;
  text-align: center;
  border-radius: 4px;
  cursor: pointer;
  transition: all 0.3s;
  overflow: hidden;
  white-space: nowrap;
  margin: 1px;
}

.treemap-item:hover {
  transform: scale(1.05);
}

.action-menu {
  z-index: 1000;
}

.color-picker,
.edit-field {
  z-index: 1000;
}
</style>