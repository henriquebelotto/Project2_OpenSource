#!c:\Python\python.exe
print("Content-Type: text/html \n\n")


print("<!DOCTYPE html><html lang=\"en\"><head><meta charset=\"UTF-8\">"
      "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">"
      "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">"
      "<meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\"> <!-- edge compatible -->"
      "<link rel=\"stylesheet\" class=\"card-link\" href=\"css/bootstrap.css\">"
      "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\">"
      "<script src=\"script/jquery-3.2.1.js\"></script>"
      "<script src=\"script/tether.js\"></script>"
      "<script src=\"script/bootstrap.js\"></script>"
      "<script type=\"text/javascript\" src=\"script/javascript.js\"></script>"
      "<title>XYZ Company - Create your own Group!</title>"
      "</head>"
      "<body>")

print("<div class=\"container\">")
print("<div class=\"jumbotron bg-success\">"
      "<h1 class=\"text-center\">Submit your own group</h1>"
      "</div>")

print("""<div class=\"row\">
    <div class=\"jumbotron bg-info col-4\">
        <form method=\"post\" action=\"\">
            <div class=\"text-left\">
                <div class=\"mb-3\">
                    <label for=\"fileupload\"> Select a file to upload</label>
                    <input type=\"file\" name=\"fileupload\" value=\"fileupload\" id=\"fileupload\"> 
                </div> 
                   
                <div class=\"mb-3\">
                    <label for=\"groupSize\"><b>Group Size:</b></label>
                    <input type=\"number\" name=\"groupSize\" id=\"groupSize\" min=\"1\" max=\"99\">                   
                </div>
                
                <div class=\"mb-3\">
                    <button class=\"btn btn-success\" type=\"submit\" value=\"submit\" name=\"submit\">Create Account</button>                
                </div>       
            </div>
        </form>            
    </div>'""")
