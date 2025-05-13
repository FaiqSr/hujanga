@extends('dashboard.dashboardLayout')
@section('title', 'Message')

@section('content')
    <section class="px-4 lg:px-8 w-full pt-24">
        <div class="w-full mx-auto">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Inbox Messages</h1>
                <div class="relative w-full md:w-64">
                    <input type="text" placeholder="Search messages..."
                        class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-primary-500 dark:focus:ring-primary-400">
                    <i class="fa-solid fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>

            <!-- Email List -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 overflow-hidden">
                <!-- Email List Header -->
                <div
                    class="grid grid-cols-12 bg-gray-50 dark:bg-gray-700 px-4 py-3 border-b border-gray-200 dark:border-gray-700 font-medium text-sm text-gray-500 dark:text-gray-400">
                    <div class="col-span-4 lg:col-span-3">Sender</div>
                    <div class="col-span-8 lg:col-span-6">Subject</div>
                    <div class="hidden lg:col-span-3 lg:block">Date</div>
                </div>

                <!-- Email Items -->
                @if ($data && count($data) > 0)
                    @foreach ($data as $key => $email)
                        <button
                            class="email-item w-full grid grid-cols-12 px-4 py-3 border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors cursor-pointer"
                            data-id="{{ $key }}" data-name="{{ $email['name'] }}"
                            data-email="{{ $email['email'] }}" data-subject="{{ $email['subject'] }}"
                            data-message="{{ $email['message'] }}" data-created-at="{{ $email['created_at'] }}">
                            <div class="col-span-4 lg:col-span-3 flex items-center">
                                <div class="text-start">
                                    <div class="font-medium text-gray-900 dark:text-white">{{ $email['name'] }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400 hidden sm:flex">
                                        {{ $email['email'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-8 lg:col-span-6 flex items-center">
                                <div class="text-start">
                                    <div class="font-medium text-gray-900 dark:text-white">{{ $email['subject'] }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400 truncate">
                                        {{ Str::limit($email['message'], 40) }}</div>
                                </div>
                            </div>
                            <div
                                class="hidden lg:col-span-3 lg:flex items-center justify-start text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($email['created_at'])->diffForHumans() }}
                            </div>
                        </button>
                    @endforeach
                @else
                    <!-- Empty State -->
                    <div class="w-full p-12 text-center">
                        <div class="mx-auto w-24 h-24 mb-4 text-gray-400">
                            <i class="fa-regular fa-envelope-open text-6xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-1">No messages yet</h3>
                        <p class="text-gray-500 dark:text-gray-400">Your inbox is empty. When you receive messages, they'll
                            appear here.</p>
                    </div>
                @endif
            </div>

            <!-- Email Detail View -->
            <div id="emailDetail"
                class="hidden mt-6 bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6">
                    <!-- Email Header -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-4">
                        <div class="flex justify-between items-start mb-4">
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white" id="emailSubject">Regarding your
                                recent inquiry</h2>
                            <button id="closeEmail" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                <i class="fa-solid fa-times"></i>
                            </button>
                        </div>
                        <div class="flex items-center">
                            <div
                                class="flex-shrink-0 h-12 w-12 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center mr-4">
                                <span class="text-primary-600 dark:text-primary-300 text-lg font-medium"
                                    id="senderInitials">JD</span>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900 dark:text-white" id="senderName">John Doe</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400" id="senderEmail">john@example.com
                                </div>
                            </div>
                            <div class="ml-auto text-sm text-gray-500 dark:text-gray-400" id="emailDate">May 15, 2023, 10:30
                                AM</div>
                        </div>
                    </div>

                    <!-- Email Body -->
                    <div class="prose dark:prose-invert max-w-none" id="emailMessage">
                        <p>Hello,</p>
                        <p>I wanted to follow up on your question about our services. We'd be happy to provide more
                            information and discuss how we can meet your needs.</p>
                        <p>Please let me know a convenient time for you to chat.</p>
                        <p>Best regards,<br>John</p>
                    </div>

                    <!-- Email Actions -->
                    <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700 flex gap-3">
                        <button
                            class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
                            <i class="fa-solid fa-reply mr-2"></i> Reply
                        </button>
                        <button
                            class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <i class="fa-solid fa-share mr-2"></i> Forward
                        </button>
                        <form action="{{ route('deleteMessage') }}" method="POST">
                            @csrf
                            <input type="hidden" name="emailId" id="emailId">
                            <button type="submit"
                                class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors ml-auto">
                                <i class="fa-solid fa-trash mr-2"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            @if ($data && count($data) > 0)
                <div class="mt-6 flex justify-center">
                    <nav class="inline-flex rounded-md shadow">
                        <a href="#"
                            class="px-3 py-2 rounded-l-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                            Previous
                        </a>
                        <a href="#"
                            class="px-3 py-2 border-t border-b border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-sm font-medium text-primary-600 dark:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                            1
                        </a>
                        <a href="#"
                            class="px-3 py-2 border-t border-b border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                            2
                        </a>
                        <a href="#"
                            class="px-3 py-2 border-t border-b border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                            3
                        </a>
                        <a href="#"
                            class="px-3 py-2 rounded-r-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                            Next
                        </a>
                    </nav>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('script-bottom')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.email-item').forEach(button => {
                button.addEventListener('click', () => {
                    const email = {
                        id: button.dataset.id,
                        name: button.dataset.name,
                        email: button.dataset.email,
                        subject: button.dataset.subject,
                        message: button.dataset.message,
                        created_at: button.dataset.createdAt,
                    };
                    openMessage(email);
                });
            });

            const closeButton = document.getElementById('closeEmail');
            closeButton.addEventListener('click', function() {
                document.getElementById('emailDetail').classList.add('hidden');
            });
        });

        const openMessage = (email) => {
            document.getElementById('emailDetail').classList.remove('hidden');
            document.getElementById('senderInitials').textContent = email.name.charAt(0).toUpperCase();
            document.getElementById('senderName').textContent = email.name;
            document.getElementById('senderEmail').textContent = email.email;
            document.getElementById('emailDate').textContent = email.created_at;
            document.getElementById('emailSubject').textContent = email.subject;
            document.getElementById('emailMessage').textContent = email.message;
            document.getElementById('emailId').value = email.id;
        };
    </script>
@endsection
