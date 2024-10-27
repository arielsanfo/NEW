self.addEventListener('fetch', function(event) {
   console.log('Fetching : ${event.request.url}, Mode : ${event.request.mode}');
   if(event.request.mode = 'navigate'){
    event.responWidth(
      (async ()=>{
          return new Reponse("Bonjour les gens");
    })()
    );
   }
  });