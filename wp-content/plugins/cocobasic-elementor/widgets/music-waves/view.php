<div class="music-waves">
    <div class="relative">
        <audio id="musicWaves" loop autoplay>
            <source src="<?php echo $settings['audio_url']['url']; ?>">  
        </audio>
        <span class="global-background-color"></span>
        <span class="global-background-color"></span>
        <span class="global-background-color"></span>
        <span class="global-background-color"></span>
        <span class="global-background-color"></span>    
    </div>
    <p class="music-waves-text"><?php echo $settings['wave_text'] ? $settings['wave_text'] : ''; ?></p>
</div>

