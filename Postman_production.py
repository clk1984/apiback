# Read in the file
with open('Photolike.postman_collection.json', 'r') as file :
  filedata = file.read()

# Replace the target string
filedata = filedata.replace('laravel.example.com', 'api.photolike.bid')

# Write the file out again
with open('Photolike.postman_collection.json', 'w') as file:
  file.write(filedata)