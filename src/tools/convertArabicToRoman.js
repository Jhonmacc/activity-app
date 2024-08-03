class ArabicToRomanConverter {
  constructor() {
    this.arabicToRomanMap = [
      { arabic: 1000, roman: 'M' },
      { arabic: 900, roman: 'CM' },
      { arabic: 500, roman: 'D' },
      { arabic: 400, roman: 'CD' },
      { arabic: 100, roman: 'C' },
      { arabic: 90, roman: 'XC' },
      { arabic: 50, roman: 'L' },
      { arabic: 40, roman: 'XL' },
      { arabic: 10, roman: 'X' },
      { arabic: 9, roman: 'IX' },
      { arabic: 5, roman: 'V' },
      { arabic: 4, roman: 'IV' },
      { arabic: 1, roman: 'I' }
    ];
  }

  convert(number) {
    let roman = '';
    for (let i = 0; i < this.arabicToRomanMap.length; i++) {
      const { arabic, roman: romanNumeral } = this.arabicToRomanMap[i];
      while (number >= arabic) {
        roman += romanNumeral;
        number -= arabic;
      }
    }
    return roman;
  }
}

export default ArabicToRomanConverter;