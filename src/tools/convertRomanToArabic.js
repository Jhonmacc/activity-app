import ArabicToRomanConverter from './convertArabicToRoman';

class RomanToArabicConverter extends ArabicToRomanConverter {
  constructor() {
    super();
    this.romanToArabicMap = {};
    this.arabicToRomanMap.forEach(({ arabic, roman }) => {
      this.romanToArabicMap[roman] = arabic;
    });
  }

  convert(roman) {
    let number = 0;
    let isValid = true;

    for (let i = 0; i < roman.length; i++) {
      const current = this.romanToArabicMap[roman[i]];
      const next = this.romanToArabicMap[roman[i + 1]];

      if (current === undefined) {
        isValid = false;
        break;
      }

      if (next && current < next) {
        number -= current;
      } else {
        number += current;
      }
    }

    return isValid ? number : null;
  }
}

export default RomanToArabicConverter;
