if (typeof faq == "undefined" || !faq) {
    var faq = {};
}

faq.tree = {
    init: function() {
        $('.faq-tree-toggle').on('click', this.toggle)
        return true;
    },
    
    toggle: function() {
        $(this).parent("div").parent("div").parent("li").find("ul").toggle("slow");
        return false;
    }
};

faq.tree.init();