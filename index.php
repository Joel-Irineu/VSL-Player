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
    if(array_key_exists('gerarVsl, $_POST')){
        update_option('vsl-video-url', $_POST['vsl-video-url']);
        update_option('vsl-time-btn', $_POST['vsl-time-btn']);
        update_option('vsl-time-btn-color', $_POST['vsl-time-btn-color']);
        update_option('vsl-link-cta', $_POST['vsl-link-cta']);
        update_option('vsl-text-btn', $_POST['vsl-text-btn']);
        update_option('vsl-btn-color', $_POST['vsl-btn-color']);
        update_option('vsl-btn-bg', $_POST['vsl-btn-bg']);
    }
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
                <label for="vsl-text-btn">Texto do botão CTA:</label>
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
        <div>
            <?php
                echo get_option('vsl-video-url');
                echo get_option('vsl-time-btn');
                echo get_option('vsl-link-btn');
                echo get_option('vsl-text-btn');
                echo get_option('vsl-btn-bg');
                echo get_option('vsl-btn-text');
            ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js"></script>
<?php
}
// Criando shortcode
function vslPlayerShortcode(){
    $videoUrl = get_option('vsl-video-url');
    $timeBtn = get_option('vsl-time-btn');
    $linkBtn = get_option('vsl-link-btn');
    $textBtn = get_option('vsl-text-btn');
    $btnBg = get_option('vsl-btn-bg');
    $btnText = get_option('vsl-btn-text');
    $html = '<div class="vsl-player">
                <video controls>
                    <source src="'.$videoUrl.'" type="video/mp4">
                </video>
                <div class="vsl-player-btn" style="background-color: '.$btnBg.'; color: '.$btnText.'">
                    <a href="'.$linkBtn.'">'.$textBtn.'</a>
                </div>
            </div>';
    return $html;
}
add_shortcode('vsl-player', 'vslPlayerShortcode');
?>