<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>

            <a
                href="{{ route('posts.create') }}"
                class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                + New Post
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('status'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($posts->count() === 0)
                        <div class="text-gray-500">
                            No posts yet. Create your first one.
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach ($posts as $post)
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="min-w-0">
                                            <div class="font-semibold text-lg text-gray-900 truncate">
                                                {{ $post->title }}
                                            </div>

                                            <div class="mt-1 text-sm text-gray-500">
                                                {{ $post->created_at->diffForHumans() }}
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-2 shrink-0">
                                            <a
                                                href="{{ route('posts.edit', $post) }}"
                                                class="inline-flex items-center rounded-md bg-gray-100 px-3 py-1.5 text-sm font-semibold text-gray-800 hover:bg-gray-200"
                                            >
                                                Edit
                                            </a>

                                            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="inline-flex items-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold text-white hover:bg-red-700"
                                                    onclick="return confirm('Delete this post?')"
                                                >
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    @if ($post->body)
                                        <div class="mt-3 text-gray-800 whitespace-pre-line">
                                            {{ $post->body }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            {{ $posts->links() }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
