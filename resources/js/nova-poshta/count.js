import axios from 'axios';

export default function (locale) {
  return {
    submitButton: document.querySelector('#submit'),
    price: document.querySelector('#price'),
    city: document.querySelector('#cities'),
    warehouse: document.querySelector('#warehouses'),
    result: document.querySelector('#result'),
    resultText: document.querySelector('#result p'),
    locale: locale,

    init: function () {
      this.submitButton.addEventListener('click', async (event) => {
        this.resultText.innerText = await this.submit()
      })
    },

    submit: async function () {
      const response = await axios.post(`api/${this.locale}/estimate`, {
        price: this.price.value,
        city: this.city.value,
        warehouse: this.warehouse.value,
      })

      return response['data']
    }

  }
}
