@push('scripts')
    <script>
        let countriesList = countries.getNames("{{ $locale }}")
        let select = document.querySelector('#country');

        for (const code in countriesList) {
            select.options[select.options.length] = new Option(countriesList[code], code);
        }
    </script>
@endpush
