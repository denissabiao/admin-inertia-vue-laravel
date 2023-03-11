<template>
    <div class="flex flex-row mx-10 mt-10 ">
        <div class="mx-5 text-center bg-teal-200 rounded-md basis-1/3">
            <div class="flex items-center justify-center h-full">
                <p class="text-center">Seu texto aqui</p>
            </div>
        </div>
        <div class="mx-5 text-center rounded-md basis-1/3 bg-violet-400">
            <div class="flex items-center justify-center h-full">
                <p class="text-center">Seu texto aqui</p>
            </div>
        </div>
        <slot/>
        <div class="justify-center mx-5 text-center bg-blue-500 rounded-md basis-1/3 ">
            <div class="flex items-center justify-center h-full">
                <p class="text-center">Seu texto aqui</p>
            </div>
        </div>
        
        <div class="w-full overflow-hidden text-center rounded-md bg-lime-400 lg:h-80 basis-1/3">
            <div class="flex items-center justify-center h-full">
                <p class="text-center">Seu texto aqui</p>
            </div>
        </div>

    </div>
</template>
  
 

