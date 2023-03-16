<template>
    <div class="col-span-1 sm:col-span-3">
        <label :for=field class="block text-sm font-medium leading-6 text-gray-900">{{ labelField }}</label>
        <input type="password" v-model="form[field]" @focusin="clearError(field)" :name=field :id=field
            autocomplete="given-name" :class="
                !form.errors[field]
                    ? 'input'
                    : 'inputError'
            ">
        <span v-if="form.errors[field]" class="text-red-600">
            {{ form.errors[field] }}
        </span>
    </div>
</template>

<script setup>


const props = defineProps({
    field: String,
    form: Object,
    type: String,
    labelField: String,
});

function clearError(fieldName) {
    props.form.clearErrors(fieldName)
}
</script>

<script >
export default {


}
</script>


