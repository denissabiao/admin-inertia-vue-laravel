<template>
    <div class="col-span-1 sm:col-span-3">
        <label :for=field class="block text-sm font-medium leading-6 text-gray-900">{{ labelField }}</label>
        <input :type=typeField v-model="$store.state.form[field]" @focusin="clearError(field)" :name=field :id=field
            autocomplete="given-name" :class="
                !$store.state.form.errors[field]
                    ? 'input'
                    : 'inputError'
            ">
        <span v-if="$store.state.form.errors[field]" class="text-red-600">
            {{ $store.state.form.errors[field] }}
        </span>
    </div>
</template>

<script setup>


const props = defineProps({
    field: String,
    form: Object,
    type: String,
    labelField: String,
    typeField: String,
});


</script>

<script >
export default {
    methods: {
        clearError(fieldName) {
            this.$store.state.form.clearErrors(fieldName)
        }
    }

}
</script>


