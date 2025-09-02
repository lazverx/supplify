{{-- Footer --}}
    <footer class="bg-[#FAE3AC] text-black fade-up">
        <div class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <img src="{{ asset('image/logo-supplify.png') }}" alt="Logo Supplify" class="h-[50px] w-auto">
                <p class="text-sm mb-4">Supplify mempermudah Anda terhubung dengan pemasok terpercaya.</p>
            </div>

            <div>
                <h3 class="font-bold mb-3">Customer Service</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center gap-2">
                        {{-- gmail Icon --}}
                        <img src="{{ asset('image/icons/gmail.svg') }}"
                            alt="gmail"
                            class="w-5 h-5">
                        <span>
                            Email:
                            <a href="mailto:ajipamungkasoffice7308@gmail.com" class="hover:underline text-[#223A5E]">
                                ajipamungkasoffice7308@gmail.com
                            </a>
                    </li>
                    <li class="flex items-center gap-2">
                        {{-- whatsapp Icon --}}
                        <img src="{{ asset('image/icons/whatsapp.svg') }}"
                            alt="whatsapp"
                            class="w-5 h-5">
                        <span>
                            WhatsApp:
                            <a href="https://wa.me/6282329453188" target="_blank" class="hover:underline text-[#223A5E]">
                                +62 823-2945-3188
                            </a>
                        </span>
                    </li>

                    <li class="flex items-center gap-2">
                        {{-- Instagram Icon --}}
                        <img src="{{ asset('image/icons/instagram.svg') }}"
                            alt="Instagram"
                            class="w-5 h-5">

                        <span>
                            Instagram:
                            <a href="https://www.instagram.com/supplify_project?igsh=MTR6a3VqZTgzZ21zYg=="
                                target="_blank"
                                class="hover:underline text-[#223A5E]">
                                @supplify
                            </a>
                        </span>
                    </li>

                </ul>
            </div>

            <div>
                <h3 class="font-bold mb-3">Jam Layanan</h3>
                <p class="text-sm">Senin - Jumat: 08:00 - 17:00 WIB</p>
                <p class="text-sm">Sabtu: 09:00 - 15:00 WIB</p>
                <p class="text-sm">Minggu & Libur Nasional: Tutup</p>
            </div>
        </div>

        <div class="bg-[#1F2544] text-white text-center py-4">
            <p class="text-sm">© 2025 Supplify. All rights reserved.</p>
        </div>
    </footer>