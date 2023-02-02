import axios from "axios";

export default function(locale) {
	return {
		cities: document.querySelector("#cities"),
		warehouses: document.querySelector("#warehouses"),
		city: "",
		locale: locale,
		warehousesOptions: {},

		getWarehouses: async function(city) {
			const dep = await axios.get(
				`api/${this.locale}/warehouses/${city}`
			);

			return dep.data;
		},
		init: function() {
			this.switchActive(false);
			this.cities.addEventListener("change", async (event) => {
				this.city = await event.target.value;
				this.refreshOptions();
			});
		},

		refreshOptions: async function() {
			this.removeOptions();
			if (this.cities.value !== "none") {
				await this.getOptions();
				this.addOptions();
			}
			this.checkOptions();
		},

		getOptions: async function() {
			this.warehousesOptions = await this.getWarehouses(this.city);
		},

		checkOptions: function() {
			if (Object.keys(this.warehouses.options).length < 2) {
				this.switchActive(false);
			} else {
				this.switchActive(true);
			}
		},

		switchActive: function(active = true) {
			this.warehouses.disabled = !active;

			const add = active ? "cursor-pointer" : "cursor-not-allowed";
			const remove = active ? "cursor-not-allowed" : "cursor-pointer";

			this.warehouses.classList.remove(remove);
			this.warehouses.classList.add(add);
		},

		addOptions: function() {
			for (const [ref, name] of Object.entries(this.warehousesOptions)) {
				let option = document.createElement("option");
				option.text = name;
				option.value = ref;
				this.warehouses.add(option);
			}
		},

		removeOptions: function() {
			while (this.warehouses.options.length > 1) {
				this.warehouses.remove(1);
			}
		},
	};
}
