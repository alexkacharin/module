<?= $faq_category['title'] ?>
            <?php if (isset($faq_category['children'])): ?><br/>

                <?= $this->getMenuHtml($faq_category['children']) ?>
<br/>
            <?php endif; ?>