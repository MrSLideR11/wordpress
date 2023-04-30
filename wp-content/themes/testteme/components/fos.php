<form action="/" method="post" class="fos fos_<?php echo $args['orientation']; ?>">
    <?php foreach($args['inputs'] as $item){ ?>
        <input 
            type="<?php echo $item['type']; ?>" 
            name="<?php echo $item['name']; ?>" 
            placeholder="<?php echo $item['placeholder']; ?>"
            <?php echo $item['required'] ? 'required' : ''; ?>
        >
    <?php } ?>
    <button type="submit" class="btn_fos">Обратный звонок</button>
</form>
<?php if($args['agreement']){ ?>
    <p class="fos_signature"><?php echo get_theme_mod("fos_signature"); ?></p>
<?php } ?>