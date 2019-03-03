#remove old folder
Remove-Item -Path .\ext_module -Force -Recurse

#Clone Tstuff modules
git clone https://github.com/TimTimTstuff/TStuffPhpModules .\ext_module

#copy needed files
Copy-Item -Path ext_module\TStuff -Destination .\ -Recurse -Force 

#remove folder
Remove-Item -Path ext_module -Force -Recurse


