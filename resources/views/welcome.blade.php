@extends('layouts.app')

@section('content')
<div class="">
    <div class="bg-blue-darkest mb-8">
        <div class="container mx-auto px-6 py-12">
            <h1 class="text-white pt-16 font-normal mb-6">Larascrum</h1>
            <h2 class="text-white text-4xl md:text-5xl font-display font-semibold mb-4 leading-none">
                Looking for an online SCRUM application?
            </h2>
            <div class="mb-12">
                 <p class="mb-16 text-grey-darker text-2xl leading-normal">
                    The modern and easy way to keep your projects up to date <br />
                    with <strong class="text-white font-bold">minimal effort</strong> and <strong class="text-white font-bold">maximal efficiency</strong>.
                </p>
            </div>
            <p class="text-white font-bold text-lg leading-normal mb-4">Get notified whenever we publish something new</p>
            <form class="sm:flex">
                <input class="block bg-white w-full mb-2 sm:mb-0 px-6 py-3 rounded text-lg sm:rounded-r-none sm:mb-0 sm:w-64" placeholder="Enter your email">
                <button class="w-full sm:w-auto bg-indigo hover:bg-indigo-light uppercase text-white font-bold tracking-wide rounded px-6 py-3 sm:rounded-l-none">Subscribe</button>
            </form>
        </div>
    </div>

    <div class="container mx-auto px-6">
        <div class="flex items-baseline justify-between border-b-2 border-grey-light mb-10">
            <span class="font-display font-bold text-blue-darker tracking-wide uppercase py-4 border-b-2 border-blue-darker -mb-2px">Pricing Options</span>
        </div>
        <div class="flex flex-wrap -mx-6">
            @include('cards.essential')
            @include('cards.complete')

        </div>
    </div>

</div>
@endsection
