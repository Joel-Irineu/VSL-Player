<?php
/**
 * Plugin Name: VSL-Player
 * Plugin URI: https://github.com/Joel-Irineu/VSL-Player
 * Description: Plugin para VSL
 * Author: Joel Irineu
 * Author URI: https://joelirineu.com.br
 * Version: 1.0
 */

//  Criando menu
function menuVslPlayer() {
    add_menu_page('VSL Player', 'VSL Player', 'manage_options', 'vsl-player', 'vslPlayer', 'dashicons-media-video', 30);
}
add_action('admin_menu', 'menuVslPlayer');

// Criando página
function vslPlayer(){
?>
    <div class="wrap">
        <h1>Bem Vindo(a) ao VSL Player</h1>
        <form method="post">
            <div class="row">
                <label for="vsl-video-url">Link do Vídeo:</label>
                <input type="text" name="vsl-video-url" id="vsl-video-url" placeholder="https://www.meusite.com/meu-video.mp4">
            </div>
            <div class="row">
                <label for="vsl-time-btn">Insira o tempo para o botão aparecer:</label>
                <input type="text" name="vsl-time-btn" id="vsl-time-btn" placeholder="00:00" data-mask="00:00">
            </div>
            <div class="row">
                <label for="vsl-link-btn">Link da CTA:</label>
                <input type="text" name="vsl-link-btn" id="vsl-link-btn" placeholder="https://www.meusite.com/checkout">
            </div>
            <div class="row">
                <label for="vsl-text-btn">Texto do botão:</label>
                <input type="text" name="vsl-text-btn" id="vsl-text-btn" placeholder="Clique aqui">
            </div>
            <div class="row">
                <div class="col">
                    <label for="vsl-btn-bg">Cor do botão play/pause:</label>
                    <input type="color" name="vsl-btn-bg" id="vsl-btn-bg" value="#ffffff">
                </div>
                <div class="col">
                    <label for="vsl-btn-text">Cor do texto do botão play/pause:</label>
                    <input type="color" name="vsl-btn-text" id="vsl-btn-text" value="#000000">
                </div>
            </div>
            <div class="row">
                <input type="submit" name="gerarVsl" value="Criar VSL" class="button button-primary">
            </div>
                
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js"></script>
<?php
}

?>