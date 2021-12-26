<template>
    <v-autocomplete
        v-model="model"
        :items="items"
        :label="label"
        item-text="value"
        item-value="id"
        dense
    ></v-autocomplete>
</template>

<script>
export default {
    data() {
        return {
            items: [],
            model: null,
        }
    },

    props: {
        modelProp: {
            type: Number,
            default: null,
        },
        label: {
            type: String,
            default: ""
        },
        table: {
            type: String,
            default: ""
        },
        primaryKey: {
            type: String,
            default: null
        },
        field: {
            type: String,
            default: "",
        },
        whereColumn: {
            type: String,
            default: null,
        },
        whereColumnId: {
            type: Number,
            default: null,
        },
        countryId: {
            type: Number,
            default: null,
        },
    },

    mounted() {

        if (!this.whereColumn || this.modelProp) {

            if (this.countryId) {

                if (this.countryId == 169) {

                    this.fetchApi()
                }
            } else {

                this.fetchApi()
            }
        }

        this.model = this.modelProp
    },

    watch: {
        model: {
            handler (val) {
                if (val) {
                    this.$emit('update:model-prop', val)
                }
            },
            deep: true,
        },

        whereColumnId: {
            handler (val) {

                this.items = []
                this.model = null
                this.$emit('update:model-prop', null)

                if (val) {

                    this.fetchApi()
                }
            },
            deep: true,
        },

        countryId: {
            handler (val) {

                this.items = []
                this.model = null
                this.$emit('update:model-prop', null)

                if (val) {

                    if (this.countryId) {

                        if (this.countryId == 169) {

                            this.fetchApi()
                        }
                    }
                }
            },
            deep: true,
        },
    },

    methods: {
        async fetchApi() {
            await axios.post('/api/table-dropdown-items', {
                table: this.table,
                primaryKey: this.primaryKey,
                field: this.field,
                whereColumn: this.whereColumn,
                whereColumnId: this.whereColumnId,
            })
            .then(response => {

                this.items = response.data
            })
            .catch(error => {

                this.$swal.fire({
                    title: 'Something went wrong',
                    text: "Please refresh the page.",
                    icon: 'error',
                    confirmButtonColor: '#d33',
                })
            })
        }
    }
}
</script>

<style>

</style>
