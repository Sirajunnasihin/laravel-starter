@php $editing = isset($major) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.select name="faculty_id" label="Faculty" required>
            @php $selected = old('faculty_id', ($editing ? $major->faculty_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Faculty</option>
            @foreach($faculties as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $major->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="desc"
            label="Desc"
            :value="old('desc', ($editing ? $major->desc : ''))"
            maxlength="255"
            placeholder="Desc"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
