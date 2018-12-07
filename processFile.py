#!c:\Python\python.exe
print("Content-Type: text/html \n\n")
# import pandas as pd
import cgi
import os
import cgitb; cgitb.enable()




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
print("""<div class=\"jumbotron bg-success\">
            <h1 class=\"text-center\">Submit your own group</h1>
         </div>""")

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
            </div>""")

form = cgi.FieldStorage()
message = ""
content = ""
names = []
interests = []
dates = []

fileRawData = dict()
# empty groups
groups = []

interestsUnique = set()
datesUnique = set()



groupSize = form.getvalue('groupSize')

# verifying that a group size was entered by the user
if groupSize is None:
    message = "You must enter the group size before submitting the file"
    
# if groupSize is defined (must be bigger than 0, the website ensure that)
# then read the file and create the groups
else:
    try:
        fileitem = form.getvalue('fileupload')
    except NameError:
        fileitem = None

    if fileitem is None:
        message = "No file Uploaded"
    else:
        fn = os.path.basename(fileitem)
        file = open(fn, 'r')
        message = 'The file "' + fn + '"was uploaded successfully'
        content = file.read().splitlines()
        for line in content:

            names.append(line.split(';')[0])
            interests.append(line.split(';')[1])
            dates.append(line.split(';')[2])

            # Creating sets to have unique values and create possible groups based on these values
            interestsUnique.add(line.split(';')[1])
            datesUnique.add(line.split(';')[2])
            # empty groups for now
            groups.append("")

        fileRawData["names"] = names
        fileRawData["interests"] = interests
        fileRawData["dates"] = dates




        

print("""<div class=\"jumbotron bg-secondary col-8\">
                <div>
                    <h4>""" + message + """</h4>
                </div>""")


print("""       <div>
                     
                    
                </div>            
            </div>
        </div>""")

print(fileRawData)
# df = pd.DataFrame(fileRawData)
# df.head()