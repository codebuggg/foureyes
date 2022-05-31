<template>
    <select :value="value" @change="onChangeState" class='block w-full py-2 px-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm'>>
        <option v-for='(option, i) in header.options'>{{option}}</option>
    </select>
</template>
<script>
    export default {
        name: "State",
        props: [
            "row",
            "header",
        ],
        data(){
            return {
                value: "",
            }
        },
        created(){
            console.log(this.header);
            this.value = this.row[this.header.key];
        },
        methods: {
            onChangeState: async function ({target}) {
                const { value } = target;
                const res = await authFetch(`admin/orders/${this.row.id}/state`, {
                    method: "put",
                    body: {
                        state: value,
                    }
                });
                if(res.ok){
                    this.$emit("onUpdateRow", { 
                        index: this.index, 
                        row: { 
                            ...this.row, 
                            state: value 
                        } 
                    });
                }
            }
        }
    }
</script>