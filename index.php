<?php
/**
 * Plugin Name: VSL-Player
 * Plugin URI: https://github.com/Joel-Irineu/VSL-Player
 * Description: Plugin para VSL
 * Author: Joel Irineu
 * Author URI: https://joelirineu.com.br
 * Version: 1.0
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

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
    $html = '
    <video class="myVideo" controls muted="">
        <source src="'.$videoUrl.'" type="video/mp4">
    </video>
    <div class="play btn-play" style="background-color: '.$btnBg.'; color: '.$btnText.'">
        <h3>Seu vídeo já começou</h3>
        <i class="fa-solid fa-volume-slash"></i>
        <h3>Clique para ouvir</h3>
    </div>
    <div class="pause btn-play" style="background-color: '.$btnBg.'; color: '.$btnText.'">
        <h3>Não perca essa oportunidade!</h3>
        <i class="fa-solid fa-play-pause"></i>
        <h3>continue assistindo</h3>
    </div>
    <div class="btncompra">
        <a href="'.$linkBtn.'" target="_blank" class="btn-link-compra">
            '.$textBtn.'
        </a>
    </div>
    ';
    return $html;
}
add_shortcode('vsl-player', 'vslPlayerShortcode');

function vslPlayerHead(){
        echo '
            <!-- batata -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
            <link rel="stylesheet" href="/includes/css/player.css">
        ';
    }
    
// Adicionar css 
add_action('wp_head', 'addStyles');
add_action('wp_footer', 'addScripts');

// 
function addStyles(){
    wp_enqueue_style('vsl-player-css', plugins_url('includes/css/player.css', __FILE__));
}

function addScripts(){
    wp_enqueue_script('vsl-player-js', plugins_url('includes/js/player.js', __FILE__), array('jquery'), '1.0', true);
}