/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */


/*
 * lineloader
 * 
 */
var lineLoaderTime = 2700;
var lineLoader = {

    load: function(){
        
        document.getElementById('lineloader').classList.remove('lineloader-wrapper');
        document.getElementById('lineloader').classList.add('lineloader-wrapper-show'); 
        
        return new Promise((resolve, reject)=>{
       
            setTimeout(()=>{
                document.getElementById('lineloader').classList.remove('lineloader-wrapper-show');
                document.getElementById('lineloader').classList.add('lineloader-wrapper');
                resolve();
            }, lineLoaderTime);
            
        });   
        
    }
        
};

