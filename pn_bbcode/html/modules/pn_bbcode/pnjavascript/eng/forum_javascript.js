function x () {                                                                                                                                    
    return;                                                                                                                                            
}                                                                                                                                                  
                                                                                                                                                   
function DoSize (fontsize) {                                                                                                                       
    var revisedMessage;                                                                                                                                
    var post = document.getElementById("post");                                                                                                        
    var currentMessage = post.message.value;                                                                                                           
    var sizeBBCode = "[size="+fontsize+"][/size]";                                                                                                     
    revisedMessage = currentMessage+sizeBBCode;                                                                                                        
    post.message.value=revisedMessage;                                                                                                                 
    post.message.focus();                                                                                                                              
    return;                                                                                                                                            
}                                                                                                                                                  
                                                                                                                                                   
function DoColor (fontcolor) {                                                                                                                     
    var revisedMessage;                                                                                                                                
    var post = document.getElementById("post");                                                                                                        
    var currentMessage = post.message.value;                                                                                                           
    var colorBBCode = "[color="+fontcolor+"][/color]";                                                                                                 
    revisedMessage = currentMessage+colorBBCode;                                                                                                       
    post.message.value=revisedMessage;                                                                                                                 
    post.message.focus();                                                                                                                              
    return;                                                                                                                                            
}                                                                                                                                                  
                                                                                                                                                   
function DoPrompt(action) {                                                                                                                        
    var revisedMessage;                                                                                                                                
    var post = document.getElementById("post");                                                                                                        
    var currentMessage = post.message.value;                                                                                                           
                                                                                                                                                       
    if (action == "url") {                                                                                                                             
        var thisURL = prompt("Enter the URL for the link you want to add", "http://");                                                                     
        var thisTitle = prompt("Enter the web site title", "Page title");                                                                                  
        var urlBBCode = "[URL="+thisURL+"]"+thisTitle+"[/URL]";                                                                                            
        revisedMessage = currentMessage+urlBBCode;                                                                                                         
        post.message.value=revisedMessage;                                                                                                                 
        post.message.focus();                                                                                                                              
        return;                                                                                                                                            
    }                                                                                                                                                  
                                                                                                                                                       
    if (action == "email") {                                                                                                                           
        var thisEmail = prompt("Enter the email address you want to add", "");                                                                             
        var emailBBCode = "[EMAIL]"+thisEmail+"[/EMAIL]";                                                                                                  
        revisedMessage = currentMessage+emailBBCode;                                                                                                       
        post.message.value=revisedMessage;                                                                                                                 
        post.message.focus();                                                                                                                              
        return;                                                                                                                                            
    }                                                                                                                                                  
                                                                                                                                                       
    if (action == "bold") {                                                                                                                            
        var thisBold = prompt("Enter the text that you want to make bold", "");                                                                            
        var boldBBCode = "[B]"+thisBold+"[/B]";                                                                                                            
        revisedMessage = currentMessage+boldBBCode;                                                                                                        
        post.message.value=revisedMessage;                                                                                                                 
        post.message.focus();                                                                                                                              
        return;                                                                                                                                            
    }                                                                                                                                                  
                                                                                                                                                       
    if (action == "italic") {                                                                                                                          
        var thisItal = prompt("Enter the text that you want to make italic", "");                                                                          
        var italBBCode = "[I]"+thisItal+"[/I]";                                                                                                            
        revisedMessage = currentMessage+italBBCode;                                                                                                        
        post.message.value=revisedMessage;                                                                                                                 
        post.message.focus();                                                                                                                              
        return;                                                                                                                                            
    }                                                                                                                                                  
                                                                                                                                                       
    if (action == "underline") {                                                                                                                       
        var thisUL = prompt("enter the underlined text", "");                                                                                              
        var ulBBCode = "[u]"+thisUL+"[/u]";                                                                                                                
        revisedMessage = currentMessage+ulBBCode;                                                                                                          
        post.message.value=revisedMessage;                                                                                                                 
        post.message.focus();                                                                                                                              
        return;                                                                                                                                            
    }                                                                                                                                                  
                                                                                                                                                       
    if (action == "image") {                                                                                                                           
        var thisImage = prompt("Enter the URL for the image you want to display", "http://");                                                              
        var imageBBCode = "[IMG]"+thisImage+"[/IMG]";                                                                                                      
        revisedMessage = currentMessage+imageBBCode;                                                                                                       
        post.message.value=revisedMessage;                                                                                                                 
        post.message.focus();                                                                                                                              
        return;                                                                                                                                            
    }                                                                                                                                                  
                                                                                                                                                       
    if (action == "quote") {                                                                                                                           
        var quoteBBCode = "[QUOTE]  [/QUOTE]";                                                                                                             
        revisedMessage = currentMessage+quoteBBCode;                                                                                                       
        post.message.value=revisedMessage;                                                                                                                 
        post.message.focus();                                                                                                                              
        return;                                                                                                                                            
    }                                                                                                                                                  
                                                                                                                                                       
    if (action == "code") {                                                                                                                            
        var codeBBCode = "[CODE]  [/CODE]";                                                                                                                
        revisedMessage = currentMessage+codeBBCode;                                                                                                        
        post.message.value=revisedMessage;                                                                                                                 
        post.message.focus();                                                                                                                              
        return;                                                                                                                                            
    }                                                                                                                                                  
                                                                                                                                                       
    if (action == "listopen") {                                                                                                                        
        var liststartBBCode = "[LIST]";                                                                                                                    
        revisedMessage = currentMessage+liststartBBCode;                                                                                                   
        post.message.value=revisedMessage;                                                                                                                 
        post.message.focus();                                                                                                                              
        return;                                                                                                                                            
    }                                                                                                                                                  
                                                                                                                                                       
    if (action == "listclose") {                                                                                                                       
        var listendBBCode = "[/LIST]";                                                                                                                     
        revisedMessage = currentMessage+listendBBCode;                                                                                                     
        post.message.value=revisedMessage;                                                                                                                 
        post.message.focus();                                                                                                                              
        return;                                                                                                                                            
    }                                                                                                                                                  
                                                                                                                                                       
    if (action == "listitem") {                                                                                                                        
        var thisItem = prompt("Enter the new list item. Note that each list group must be preceeded by a List Open and must be ended with List Close", "");
        var itemBBCode = "[*]"+thisItem;                                                                                                                   
        revisedMessage = currentMessage+itemBBCode;                                                                                                        
        post.message.value=revisedMessage;                                                                                                                 
        post.message.focus();                                                                                                                              
        return;                                                                                                                                            
    }                                                                                                                                                  
                                                                                                                                                   
}                                                                                                                                                  