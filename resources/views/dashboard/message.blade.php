@extends('dashboard.dashboardLayout')
@section('title', 'Message')

@section('content')
    <section class="px-4 lg:px-8 w-full pt-24">
        <div class="w-full mx-auto max-w-7xl">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Inbox Messages</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your incoming messages</p>
                </div>
                <div class="relative w-full md:w-72">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" placeholder="Search messages..."
                        class="block w-full pl-10 pr-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition duration-150">
                </div>
            </div>

            <!-- Message List -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <!-- Header Row -->
                <div
                    class="grid grid-cols-12 bg-gray-50 dark:bg-gray-700 px-6 py-4 border-b border-gray-200 dark:border-gray-700 font-medium text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    <div class="col-span-4 lg:col-span-3">Sender</div>
                    <div class="col-span-7 lg:col-span-6">Subject</div>
                    <div class="col-span-1 lg:col-span-3 text-right">Date</div>
                </div>

                @if ($data && count($data) > 0)
                    @foreach ($data as $key => $email)
                        <button
                            class="email-item w-full grid grid-cols-12 px-6 py-4 border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200 cursor-pointer group"
                            data-id="{{ $key }}" data-name="{{ $email['name'] }}"
                            data-email="{{ $email['email'] }}" data-subject="{{ $email['subject'] }}"
                            data-message="{{ $email['message'] }}" data-created-at="{{ $email['created_at'] }}">
                            <div class="col-span-4 lg:col-span-3 flex items-center">
                                <div
                                    class="flex-shrink-0 h-10 w-10 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center mr-3">
                                    <span class="text-primary-600 dark:text-primary-300 font-medium">
                                        {{ Str::substr($email['name'], 0, 1) }}
                                    </span>
                                </div>
                                <div class="min-w-0">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                        {{ $email['name'] }}</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 truncate hidden sm:block">
                                        {{ $email['email'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-7 lg:col-span-6 flex items-center">
                                <div class="min-w-0">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white flex items-center">
                                        <span class="truncate">{{ $email['subject'] }}</span>
                                        @if ($loop->first)
                                            <span
                                                class="ml-2 px-2 py-0.5 text-xs font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">New</span>
                                        @endif
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                        {{ Str::limit($email['message'], 60) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 lg:col-span-3 flex items-center justify-end">
                                <div class="text-xs text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($email['created_at'])->diffForHumans() }}
                                </div>
                                <div class="ml-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </button>
                    @endforeach
                @else
                    <div class="w-full p-12 text-center">
                        <div class="mx-auto w-24 h-24 mb-4 text-gray-300 dark:text-gray-500">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-1">No messages yet</h3>
                        <p class="text-gray-500 dark:text-gray-400 max-w-md mx-auto">Your inbox is empty. When you receive
                            messages, they'll appear here.</p>
                    </div>
                @endif
            </div>

            <!-- Email Detail View -->
            <div id="emailDetail"
                class="hidden mt-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 transform">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white" id="emailSubject">Regarding your recent
                            inquiry</h2>
                        <button id="closeEmail"
                            class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center mb-6">
                        <div
                            class="flex-shrink-0 h-12 w-12 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center mr-4">
                            <span class="text-primary-600 dark:text-primary-300 text-lg font-medium"
                                id="senderInitials">JD</span>
                        </div>
                        <div class="min-w-0">
                            <div class="font-medium text-gray-900 dark:text-white" id="senderName">John Doe</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400" id="senderEmail">john@example.com</div>
                        </div>
                        <div class="ml-auto text-sm text-gray-500 dark:text-gray-400" id="emailDate">May 15, 2023, 10:30 AM
                        </div>
                    </div>

                    <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300" id="emailMessage">
                        <p>Hello,</p>
                        <p>I wanted to follow up on your question about our services. We'd be happy to provide more
                            information and discuss how we can meet your needs.</p>
                        <p>Please let me know a convenient time for you to chat.</p>
                        <p>Best regards,<br>John</p>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 flex flex-wrap gap-3">
                        <button
                            class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors duration-200 flex items-center">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                            </svg>
                            Reply
                        </button>
                        <button
                            class="px-4 py-2 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg transition-colors duration-200 flex items-center">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                            Forward
                        </button>
                        <form action="{{ route('deleteMessage') }}" method="POST" class="ml-auto">
                            @csrf
                            <input type="hidden" name="emailId" id="emailId">
                            <button type="submit"
                                class="px-4 py-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors duration-200 flex items-center">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            @if ($data && count($data) > 0)
                <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span
                            class="font-medium">{{ count($data) }}</span> messages
                    </div>
                    <nav class="flex space-x-1">
                        <button
                            class="px-3 py-1 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600 disabled:opacity-50">
                            Previous
                        </button>
                        <button
                            class="px-3 py-1 rounded-md border border-primary-500 bg-primary-50 dark:bg-primary-900/30 text-primary-600 dark:text-primary-300 font-medium">
                            1
                        </button>
                        <button
                            class="px-3 py-1 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                            2
                        </button>
                        <button
                            class="px-3 py-1 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                            3
                        </button>
                        <button
                            class="px-3 py-1 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                            Next
                        </button>
                    </nav>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('script-bottom')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Email item click handler
            document.querySelectorAll('.email-item').forEach(button => {
                button.addEventListener('click', () => {
                    const email = {
                        id: button.dataset.id,
                        name: button.dataset.name,
                        email: button.dataset.email,
                        subject: button.dataset.subject,
                        message: button.dataset.message,
                        created_at: formatDate(button.dataset.createdAt),
                    };
                    openMessage(email);

                    // Mark as read (visual feedback)
                    button.classList.remove('bg-blue-50', 'dark:bg-blue-900/20');
                });
            });

            // Close email detail view
            document.getElementById('closeEmail').addEventListener('click', function() {
                document.getElementById('emailDetail').classList.add('hidden');
            });
        });

        function formatDate(dateString) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            return new Date(dateString).toLocaleDateString('en-US', options);
        }

        function openMessage(email) {
            const detailView = document.getElementById('emailDetail');

            // Populate data
            document.getElementById('senderInitials').textContent = email.name.charAt(0).toUpperCase();
            document.getElementById('senderName').textContent = email.name;
            document.getElementById('senderEmail').textContent = email.email;
            document.getElementById('emailDate').textContent = email.created_at;
            document.getElementById('emailSubject').textContent = email.subject;
            document.getElementById('emailMessage').innerHTML = email.message.replace(/\n/g, '<br>');
            document.getElementById('emailId').value = email.id;

            // Show with animation
            detailView.classList.remove('hidden');
            detailView.classList.add('animate-fade-in');

            // Scroll to detail view if mobile
            if (window.innerWidth < 768) {
                detailView.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    </script>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .prose {
            line-height: 1.6;
        }

        .prose p {
            margin-bottom: 1em;
        }

        .prose a {
            color: #3b82f6;
            text-decoration: underline;
        }

        .dark .prose {
            color: #d1d5db;
        }

        .dark .prose a {
            color: #93c5fd;
        }
    </style>
@endsection
