<?php foreach ($menu_items as $category => $items): ?>
    <div class="menu-section">
        <h3><?php echo $category; ?></h3>
        <div class="menu-items">
            <?php foreach ($items as $item => $price): ?>
                <form method="POST" class="menu-form">
                    <div class="menu-item">
                        <span><?php echo "$item - ₹$price"; ?></span>
                        <input type="hidden" name="item_name" value="<?php echo $item; ?>">
                        <input type="hidden" name="item_price" value="<?php echo $price; ?>">
                        <button type="submit" name="add_to_cart" class="btn">Add to Cart</button>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>

<style>
.menu-section {
    margin-bottom: 30px;
    background: rgba(255, 255, 255, 0.05);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 255, 150, 0.3);
}

.menu-section h3 {
    font-size: 24px;
    color: #00ffcc;
    margin-bottom: 15px;
    border-bottom: 1px solid #00ff99;
    padding-bottom: 5px;
}

.menu-items {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    justify-content: center;
}

.menu-form {
    width: 45%;
}

.menu-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #222;
    padding: 10px 15px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 255, 150, 0.2);
    color: #fff;
}

.menu-item span {
    font-size: 16px;
    font-weight: bold;
}

.btn {
    padding: 8px 15px;
    background: linear-gradient(90deg, #00ff99, #002244);
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    box-shadow: 0px 5px 15px rgba(0, 255, 150, 0.5);
    transition: all 0.3s ease-in-out;
}

.btn:hover {
    background: linear-gradient(90deg, #ff007b, #002244);
    transform: scale(1.05);
}
</style>
