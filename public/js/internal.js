var vm = new Vue({
  data:{
    video:{
      url: null
    },
    modal:{
      show: false
    }
  },
  mounted: function(){
    const self = this;

    var menu = Array.apply(null, document.querySelectorAll('.section1__content .section1__tab .menu ul li'));
    var tab = Array.apply(null, document.querySelectorAll('.section1__content .section1__tab .info .info__tab'));

    menu.filter(function (element, index) {

      element.addEventListener("click", function(event){ 

        menu.forEach(function(el, i) {
          menu[i].classList.remove('active');
          tab[i].classList.remove('active');
        });

        menu[index].classList.add('active');
        tab[index].classList.add('active');

      });

    });
  
  },
  methods: {
    onChangePrice: function(selector, value){

      var list = document.querySelector(selector);
      var items = Array.apply(null, list.querySelectorAll('.item'));

      items.sort(function(a, b) {

        var aItem = +a.getAttribute('data-price');
        var bItem = +b.getAttribute('data-price');

        if(value == 'mayor'){
          return bItem - aItem; 
        }else if(value == 'menor'){
          return aItem - bItem; 
        }

      });

      items.forEach(function(el, i) {
        list.appendChild(items[i]);
      });

    },
    onChangePlan: function(selector, value){

      var calc = value.split("-"),
          min = parseFloat(calc[0]),
          max = parseFloat(calc[1]);

      var list = document.querySelector(selector);
      var items = Array.apply(null, list.querySelectorAll('.item'));

      items.filter(function(item){

        var num = item.getAttribute('data-megas');

        if(min > num || max < num){
          item.style.display = "none";
        }else{
          item.style.display = "block";
        }

      });

    },
    openVideo: function(url){
      this.video.url = url;

      //this.video.url = '<iframe id="video" width="560" height="315" :src="'+ url +'" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>';
      //this.video.url = '<iframe width="560" height="315" src="https://www.youtube.com/embed/mvV5AloFRsY?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
      this.showModal();
    },
    showModal: function(){
      this.modal.show = true;
      document.querySelector("body").style.overflow = 'hidden';
    },
    closeModal: function(){
      this.modal.show = false;
      document.querySelector("body").style.overflow = 'auto';
    }
  }
}).$mount('#app');

function openVideo(url){
  vm.openVideo(url);
}