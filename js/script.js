

/*
var novoelemento = function(id,elemento, texto, atr,value){

	//var id = document.getElementById("lista-fomacao");	
	var idelemento = document.getElementById(id);
	var nodeelemento = document.createElement(elemento);
	//alert(atr.length);
	if(atr !== null){
		for (var i =0; i < atr.length; i++) {
			nodeelemento.setAttribute(atr[i], value[i]);
		}		
	}			
	var nodetexto = document.createTextNode(texto);
	nodeelemento.appendChild(nodetexto);
	id.appendChild(nodeelemento);
};
*/

var criarsubelemento = function(elemento, texto, atr,value){

	
	var nodeelemento = document.createElement(elemento);
        if(texto !== null){
            var nodetexto = document.createTextNode(texto);
            nodeelemento.appendChild(nodetexto);
            
        }
	//alert(atr.length);
	if(atr !== null){
            for (var i =0; i < atr.length; i++) {
		nodeelemento.setAttribute(atr[i], value[i]);
            }		
	}			
	
        return nodeelemento;
};

var inputdata = function(idelemento, elemento, atr, value){

	//var id = document.getElementById("lista-fomacao");	
	var id = document.getElementById(idelemento);
	var nodeelemento = document.createElement(elemento);
	//alert(atr.length);
	if(atr !== null){
		for (var i =0; i < atr.length; i++) {
			nodeelemento.setAttribute(atr[i], value[i]);
		}		
	}			

	id.appendChild(nodeelemento);
};


function remover(obj){
     
    decisao = confirm("Remover campo?");
    if(decisao){
        
        idformacao = document.getElementById("lista-fomacao");
        formacaodelete = document.getElementById("delete-formacao");
        pesquisadelete = document.getElementById("delete-pesquisa");
        if(obj.id==="btn-remove-formacao"){
            
            if(formacaodelete.value === ""){
                formacaodelete.value = obj.value;
            }else{
                formacaodelete.value =  formacaodelete.value + ',' + obj.value;
            }
            
        }else{
            
            if(obj.id==="btn-remove-pesquisa"){
                
                if(pesquisadelete.value === ""){
                    pesquisadelete.value = obj.value;
                }else{
                    pesquisadelete.value =  pesquisadelete.value + ',' + obj.value;
                }
                
            }
        }
        
        
        var pai = obj.parentElement;
        pai.remove(); 
    }
   
        
};




window.onload = function() {
    
    
    
    var btnpesquisa = document.getElementById("btnpesquisa");
    var add = document.getElementById("add");
    var btnadd = document.getElementById("btnadd");
    
    
    
    var btnremover = function (){
            
        /*var pai = this.parentElement;
        var filho = this.firstChild ;
        var  firstchild = pai.firstChild;
        var lastchild = pai.lastChild;
        
        while(firstchild !== lastchild){
            
            //alert(firstchild);
            console.log(firstchild.innerHTML);
            firstchild = firstchild.nextSibling;
        }
        
        //alert(pai.length);*/
        
        alert("teste");
        
       
        
        
    };
    
    
    
    /* os tens de pesquisa do professor*/
    btnpesquisa.onclick = function() {
             
        var ul = document.getElementById("lista-pesquisa").getElementsByTagName("ul")[0];
        //alert(ul);
        var  pesquisa = document.getElementById("pesquisa").value;                
        //var elemento = criarsubelemento("li",pesquisa,["class"],["pesquisa-itens"]);
        
        var elemento = document.createElement("li");
        elemento.setAttribute("class","pesquisa-itens");  
        
        
        
       
      
        var btn = document.createElement("button");
        btn.setAttribute("type","button");
        btn.setAttribute("class","btn btn-danger");
        btn.setAttribute("id","btn-remove-pesquisa");
        btn.setAttribute("onclick", "remover(this);");
        btn.appendChild(document.createTextNode("X"));
        
        elemento.appendChild(btn);
        elemento.appendChild(document.createTextNode(pesquisa));
        
        
        var input = document.createElement("input");
        input.setAttribute("type","hidden");
        input.setAttribute("name","pesquisa[]");
        input.setAttribute("value",pesquisa);
        
        //elemento.appendChild(btn);
        elemento.appendChild(input);
        
        ul.appendChild(elemento);
        
        
            
    };

    btnadd.onclick = function() {
		
                
        
    	var  tipo = document.getElementById("tipos");
	var  formacao = document.getElementById("formacao").value;
	var  instituicao = document.getElementById("instituicao").value;
	var  data = document.getElementById("data").value;	
	var  tipo =  tipo.options[tipo.selectedIndex].innerHTML;
        
        
	
        var id = document.getElementById("lista-formacao");	
        var nodeelemento = document.createElement("div");
        nodeelemento.setAttribute("class", "grupo-formacao");  
        
        var p1 = criarsubelemento("p","Tipo:",["class"],["legenda"]);
        var p2 = criarsubelemento("p",tipo,null,null); 
        
        var p3 = criarsubelemento("p","Instituição:",["class"],["legenda"]);
        var p4 = criarsubelemento("p",instituicao,null,null);   
                
        var p5 = criarsubelemento("p","Curso:",["class"],["legenda"]);
        var p6 = criarsubelemento("p",formacao,null,null);   
                
        var p7 = criarsubelemento("p","Ano de Formação:",["class"],["legenda"]);
        var p8 = criarsubelemento("p",data,null,null); 
        
      
       // adicionando os campos         
                
        nodeelemento.appendChild(p1);
        nodeelemento.appendChild(p2);       
        nodeelemento.appendChild(p3);
        nodeelemento.appendChild(p4);
        nodeelemento.appendChild(p5);
        nodeelemento.appendChild(p6);
        nodeelemento.appendChild(p7);
        nodeelemento.appendChild(p8);
        
        
        //criandos as variaveis
        var input = document.createElement("input");
        input.setAttribute("type","hidden");
        input.setAttribute("name","formacao[tipo][]");
        input.setAttribute("value",tipo);
        
        var input2 = document.createElement("input");
        input2.setAttribute("type","hidden");
        input2.setAttribute("name","formacao[formacao][]");
        input2.setAttribute("value",formacao);
        
        var input3 = document.createElement("input");
        input3.setAttribute("type","hidden");
        input3.setAttribute("name","formacao[instituicao][]");
        input3.setAttribute("value",instituicao);
        
        var input4 = document.createElement("input");
        input4.setAttribute("type","hidden");
        input4.setAttribute("name","formacao[data][]");
        input4.setAttribute("value",data);
        
        var btn = document.createElement("button");
        btn.setAttribute("type","button");
        btn.setAttribute("id","btn-remove");
        btn.setAttribute("onclick", "remover(this);");
        btn.appendChild(document.createTextNode("Remover"));
       
        
        //adicionando as variaveis a div 
        nodeelemento.appendChild(input);
        nodeelemento.appendChild(input2);
        nodeelemento.appendChild(input3);
        nodeelemento.appendChild(input4);
        nodeelemento.appendChild(btn);


        // adicionando no elemento raiz
        id.appendChild(nodeelemento);
        
        
      

    };
                
        
    
       	
};