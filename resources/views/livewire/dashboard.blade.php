<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Your history') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-2 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-2xl">
                <header>
                    <h2 class="text-lg font-medium mb-4">
                        {{ __('Calculate BMI') }}
                    </h2>
                </header>
                <form action="/bmi" method="post">
                    @csrf
                    <x-input-label class="px-2" for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="m-2 block w-full" required />
                    <x-input-label class="px-2" for="age" :value="__('Age')" />
                    <x-text-input id="age" name="age" type="number" class="m-2 block w-full" required />
                    <x-input-label class="px-2" for="height" :value="__('Height')" />
                    <x-text-input id="height" name="height" type="number" class="m-2 block w-full" required />
                    <x-input-label class="px-2" for="weight" :value="__('Weight')" />
                    <x-text-input id="weight" name="weight" type="number" class="m-2 block w-full" required />
                    <x-primary-button class="btn btn-primary m-2" type="submit">calculate</x-primary-button>
                </form>
            </div>
        </div>
        <div class="my-2 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-2xl">
                <header>
                    <h2 class="text-lg font-medium mb-4">
                        {{ __('Reduce BMI') }}
                    </h2>
                </header>
                <form action="/reduce" method="post">
                    @csrf
                    <x-text-input id="height" name="height" type="number" class="m-2 block w-full" required />
                    <x-input-label class="px-2" for="weight" :value="__('Weight')" />
                    <x-text-input id="weight" name="weight" type="number" class="m-2 block w-full" required />
                    <x-primary-button class="btn btn-primary m-2" type="submit">reduce</x-primary-button>
                </form>
            </div>
        </div>
        <div class="my-2 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg overflow-auto">
            <header>
                <h2 class="text-lg font-medium mb-4">
                    {{ __('Your history') }}
                </h2>
            </header>
            <table class="w-full mb-4 border-collapse border border-slate-500 table-auto cols-2">
                <tr>
                    <th class="border border-slate-600 px-4 py-2">ID</th>
                    <th class="border border-slate-600 px-4 py-2">Name</th>
                    <th class="border border-slate-600 px-4 py-2">Age</th>
                    <th class="border border-slate-600 px-4 py-2">Height</th>
                    <th class="border border-slate-600 px-4 py-2">Weight</th>
                    <th class="border border-slate-600 px-4 py-2">BMI</th>
                    <th class="border border-slate-600 px-4 py-2">Class</th>
                    <th class="border border-slate-600 px-4 py-2">Created At</th>
                </tr>
                @foreach ($history as $bmi)
                    <livewire:bmi wire:key="{{$bmi->id}}" :$bmi />
                @endforeach
            </table>
            {{$history->links()}}
        </div>
    </div>
</div>
