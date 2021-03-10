<x-layouts.user-settings username="{{ $user->username }}" title="{{ $title }}">

    @livewire('parent-alert')

    <div class="overflow-hidden rounded sm:rounded-md">
        <div class="px-4 py-5 bg-white space-y-4">
            <div class="border border-indigo-100 rounded sm:rounded-md">
                <div class="bg-indigo-100 px-4 py-2">
                    <h3 class="text-2xl sm:text-3xl">{{ __('Password') }}</h3>
                </div>
                <div class="px-4 py-2">
                    <p class="my-3">{{ __('Click the button below for changing password.') }}</p>
                    <button
                        type="button"
                        data-target="changePassword"
                        class="modal-open inline-flex items-center px-4 py-2 bg-indigo-400 border border-transparent rounded-md text-white hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __('Change password') }}...
                    </button>
                </div>
            </div>

            <div class="border border-red-100 rounded sm:rounded-md">
                <div class="bg-red-100 px-4 py-2">
                    <h3 class="text-2xl sm:text-3xl">{{ __('Delete account') }}</h3>
                </div>
                <div class="px-4 py-2">
                    <p class="my-3">{{ __('Once you delete your account, there is no going back. Please be certain.') }}</p>
                    <button
                        type="button"
                        data-target="deleteAccount"
                        class="modal-open inline-flex items-center px-4 py-2 bg-red-400 border border-transparent rounded-md text-white hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __('Delete your account') }}...
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal change password -->
    <x-modal id="changePassword" title="{{ __('Changing password') }}">
        @livewire('user.change-password-form')
    </x-modal>
    <!--Modal delete account -->
    <x-modal id="deleteAccount" title="{{ __('Deleting account') }}">
        @livewire('user.delete-account-form')
    </x-modal>

    @push('scripts')
        <script>
            var openmodal = document.querySelectorAll('.modal-open')
            let selectedModalTargetId = ''
            for (var i = 0; i < openmodal.length; i++) {
                openmodal[i].addEventListener('click', function (event) {
                    selectedModalTargetId = event.target.attributes.getNamedItem('data-target').value
                    event.preventDefault()
                    toggleModal()
                })
            }

            var overlay = document.querySelectorAll('.modal-overlay')
            for (var i = 0; i < overlay.length; i++) {
                overlay[i].addEventListener('click', toggleModal)
            }


            var closemodal = document.querySelectorAll('.modal-close')
            for (var i = 0; i < closemodal.length; i++) {
                closemodal[i].addEventListener('click', toggleModal)
            }

            document.onkeydown = function (evt) {
                evt = evt || window.event
                var isEscape
                if ("key" in evt) {
                    isEscape = (evt.key === "Escape" || evt.key === "Esc")
                } else {
                    isEscape = (evt.keyCode === 27)
                }
                if (isEscape && document.body.classList.contains('modal-active')) {
                    toggleModal()
                }
            }

            function toggleModal() {
                if (!selectedModalTargetId) {
                    return
                }
                const body = document.querySelector('body')
                const modal = document.getElementById(selectedModalTargetId)
                modal.classList.toggle('opacity-0')
                modal.classList.toggle('pointer-events-none')
                body.classList.toggle('modal-active')
            }

            window.addEventListener('modalSubmitted', () => {
                toggleModal()
            })
        </script>
    @endpush

</x-layouts.user-settings>
