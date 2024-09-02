@extends('layout')
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">🌟 Devenez Parrain et Bénéficiez d'Avantages Exclusifs ! 🌟</h3>
                <div class="nk-block-des text-soft">
                    <p></p>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div>
    <div class="nk-content">
        <div class="container-xl wide-xl">
            <div class="nk-content-body">
                <div class="nk-block">

       <p> Vous aimez notre service et souhaitez partager votre expérience ? En devenant parrain, vous pouvez aider vos amis à découvrir nos offres tout en profitant de récompenses exclusives !
        </p>
        <p>En utilisant ce lien de parrainage, vous et vos amis bénéficiez de nombreux avantages :</p>

        Récompenses pour vous : Recevez des bonus ou des réductions pour chaque ami qui s'inscrit.
        Avantages pour vos amis : Ils bénéficient d’offres spéciales réservées aux nouveaux membres.

        <p><a href="{{route('register_parainnage',['agensic_id'=>auth()->id()])}}" target="_blank"> 📢 Devenez parrain maintenant : Cliquez ici pour partager !</a></p>
                    <p>Ou</p><textarea hidden id="url_copy">{{route('register_parainnage',['agensic_id'=>auth()->id()])}}</textarea>
                    <p><a id="copy" style="cursor: pointer" class="text-primary">Copier le lien {{route('register_parainnage',['agensic_id'=>auth()->id()])}}</a> </p>

        Merci de faire partie de notre communauté et de partager les bonnes affaires !
        </div>
            </div></div></div>
@endsection
@push('script')
    <script>
        let editor = document.getElementById("url_copy");
        let button = document.getElementById("copy");
        button.addEventListener('click', () => {
            editor.select();
           // document.execCommand("copy");
            navigator.clipboard.writeText(editor.value);
            button.innerText = "Copié !";
        });
    </script>
@endpush
