@php $editing = isset($classroom) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $classroom->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="desc"
            label="Desc"
            :value="old('desc', ($editing ? $classroom->desc : ''))"
            maxlength="255"
            placeholder="Desc"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
