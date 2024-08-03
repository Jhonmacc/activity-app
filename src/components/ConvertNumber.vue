<template>
  <div class="max-w-md mx-auto mt-10 p-5 border rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Conversor de Números Arábicos e Romanos</h1>

    <div class="mb-8">
      <h2 class="text-xl font-semibold mb-2">Arábico para Romano</h2>
      <input
        v-model="arabicNumber"
        type="number"
        class="w-full p-2 border rounded mb-4"
        placeholder="Digite um número arábico"
        @input="convertToRoman"
      />
      <div class="flex items-center justify-between">
        <span class="text-xl">{{ romanNumber }}</span>
        <button
          class="bg-blue-500 text-white px-4 py-2 rounded"
          @click="copyToClipboard(romanNumber)"
        >
          Copiar
        </button>
      </div>
    </div>

    <div>
      <h2 class="text-xl font-semibold mb-2">Romano para Arábico</h2>
      <input
        v-model="romanNumberInput"
        type="text"
        class="w-full p-2 border rounded mb-4"
        placeholder="Digite um número romano"
        @input="convertToArabic"
      />
      <div class="flex items-center justify-between">
        <span class="text-xl">{{ arabicNumberConverted }}</span>
        <button
          class="bg-blue-500 text-white px-4 py-2 rounded"
          @click="copyToClipboard(arabicNumberConverted)"
        >
          Copiar
        </button>
      </div>
      <div v-if="romanError" class="text-red-500 mt-2">{{ romanError }}</div>
    </div>
  </div>
</template>

<script>
import ArabicToRomanConverter from '../tools/convertArabicToRoman';
import RomanToArabicConverter from '../tools/convertRomanToArabic';

export default {
  data() {
    return {
      arabicNumber: '',
      romanNumber: '',
      romanNumberInput: '',
      arabicNumberConverted: '',
      romanError: '' 
    };
  },
  methods: {
    convertToRoman() {
      const converter = new ArabicToRomanConverter();
      this.romanNumber = converter.convert(Number(this.arabicNumber));
    },
    convertToArabic() {
      const converter = new RomanToArabicConverter();
      const result = converter.convert(this.romanNumberInput.toUpperCase());
      if (result === null) {
        this.romanError = 'Não é um algarismo romano!';
        this.arabicNumberConverted = '';
      } else {
        this.romanError = '';
        this.arabicNumberConverted = result;
      }
    },
    copyToClipboard(text) {
      navigator.clipboard.writeText(text).then(() => {
        alert(`${text} copiado para a área de transferência!`);
      });
    }
  }
};
</script>
