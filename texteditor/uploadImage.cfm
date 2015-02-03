<cfset filename = ExpandPath( './uploads/' ) & form.name />
<cfloop condition="#fileExists(filename)#" >
   <cfset filename = listdeleteat(filename,listlen(filename,'.'),'.') & "_" & dateformat(now(), 'yyyymmdd') & timeformat(now(),'HHmmss') & "." & listlast(filename,'.') />
</cfloop>

<cffile action="write" file="#filename#" output="#toBinary(listlast(form.data,','))#" />
<cfcontent type="text/html" variable="#listlast(filename,'/')#" />
