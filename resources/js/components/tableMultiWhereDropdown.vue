<template>
    <v-autocomplete
        v-model="model"
        :items="items"
        :label="label"
        item-text="value"
        item-value="id"
        clearable
        :error-messages="errorMessages"
        placeholder="Start typing to Search"
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
            type: null,
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
        field: {
            type: String,
            default: "",
        },
        whereQuery: {
            type: Array,
            default: function () {
                return []
                // {
                //     column: '',
                //     value: ''
                // }
            }
        },
        errorMessages: {
            type: null,
            default: null,
        },
    },

    mounted() {

        if (this.whereQuery.length) {

            this.fetchApi()
        }

        this.model = this.modelProp
    },

    watch: {
        model: {
            handler (val) {
                this.$emit('update:model-prop', val)
            },
            deep: true,
        },
    },

    methods: {
        async fetchApi() {
            await axios.post('/api/table-multi-where-dropdown-items', {
                table: this.table,
                field: this.field,
                whereQuery: this.whereQuery,
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
