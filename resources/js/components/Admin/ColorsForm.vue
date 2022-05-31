<template>
    <div>
        <fieldset class="mt-2">
            <div class="flex justify-between">
            <legend class="">
                Select colors
            </legend>
            <span class="ml-6 flex items-center" @click="toggleShowColorsForm()">
                <svg class="block h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </span>
            </div>

            <div class="flex my-4 items-center space-x-3">
                <div v-for="(color, index) in colors" @click="handleSetColor(color.id)" :class="`${ isSelectedColor(color.id) ? 'ring ring-offset-1' : 'ring-2'} m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-700`">
                    <span aria-hidden="true" :style="`background-color: ${color.hash}`" class="h-8 w-8 bg-gray-700 border border-black border-opacity-10 rounded-full"></span>
                </div>
            </div>
        </fieldset>
        <t-modal
            header="New Color"
            v-model="showColorsForm"
    
        >
            <BaseInput
                v-model="form.name"
                label="Name"
            />
            <label>Select Color</label>
            <input
                type="color"
                v-model="form.hash"
            />
            <template v-slot:footer>
                <div class="flex justify-end">
                    <button
                    @click="createColor()"
                    type="button"
                    class="flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                    Create
                    </button>
                </div>
            </template>
        </t-modal>
    </div>
</template>
<script>
    export default {
        props: [
            "handleSetColor",
            "isSelectedColor",
            "colors"
        ],
        data(){
            return{
                showColorsForm: false,
                form: {
                    hash: "",
                    name: "",
                },
            }
        },
        methods: {
            toggleShowColorsForm(){
                this.showColorsForm = !this.showColorsForm;
            },
            async createColor(){
                let that = this;
                const res = await authFetch("admin/colors", {
                    method: 'post',
                    body: this.form,
                });
                if(res.status == 201){
                    const body = await res.json();
                    that.colors.push(body);
                    that.toggleShowColorsForm();
                }
            }
        }
    }
</script>