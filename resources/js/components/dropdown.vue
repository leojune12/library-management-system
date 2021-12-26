<template>
    <v-select
        v-model="model"
        :items="items"
        :label="label"
        item-text="value"
        item-value="id"
        dense
    ></v-select>
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
        label: {
            type: String,
            default: ""
        },
        array: {
            type: String,
            default: ""
        },
        modelProp: {
            type: null,
            default: 0,
        }
    },

    mounted() {
        this.fetchApi()
        this.model = this.modelProp
    },

    watch: {
        model: {
                handler (val) {
                    this.$emit('update:model-prop', val)
                },
                deep: true,
            }
    },

    methods: {
        async fetchApi() {
            await axios.post('/api/dropdown-items', {
                array: this.array,
            })
            .then(response => {

                this.items = response.data
                // this.model = response.data[0]
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
