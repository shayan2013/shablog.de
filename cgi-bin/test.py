#! /usr/bin/python

print 'Content-type: text/html'
print ''

import cgi
import random

form = cgi.FieldStorage()

roten = 0
weissen = 0

if "antwort" in form:
    antwort = form.getvalue("antwort")
else:
    antwort = ""
    for i in range(4):
        antwort += str(random.randint(0, 9))

if "versuch" in form:
    versuch = form.getvalue("versuch")
    for key, digit in enumerate(versuch):
        if digit == antwort[key]:
            roten += 1
        else:
            for antwortZahl in antwort:
                if antwortZahl == digit:
                    weissen += 1
                    break
else:
    versuch = ""


if "anzahlVersuche" in form:
    anzahlVersuche = int(form.getvalue("anzahlVersuche")) + 1
    if (form.getvalue("versuche") == None):
        versucheLog = ""
    else:
        versucheLog = str(form.getvalue("versuche"))
    versuche = versucheLog + str(versuch) + " : Du hast " + str(roten) + " korrekte Ziffern an der richtigen Position und " + str(weissen) + " korrekte Ziffern an der falschen Position."  + "<br>"
else:
    anzahlVersuche = 0
    versuche = ""

if anzahlVersuche == 0:
    nachricht = "Ich habe einen vierstelligen Wert ausgedacht. Kannst du ihn erraten?"
elif roten == 4:
    nachricht = "Gute Arbeit. Du hast es in " + str(anzahlVersuche) + " Versuchen gewonnen. <a href=''>Nochmal Spielen</a>"
else:
    nachricht = "Du hast " + str(roten) + " korrekte Ziffern an der richtigen Position und " + str(weissen) + " korrekte Ziffern an der falschen Position. Du hattest bisher " + str(anzahlVersuche) + " Versuch(e)"


print '<h1>Mastermind</h1>'
print "<p>" + nachricht + "<p>"
print '<form method="post">'
print '<input type="text" name="versuch" value="' + versuch + '">'
print '<input type="submit" value="Versuchen!">'
print '<input type="hidden" name="antwort" value="' + antwort + '">'
print '<input type="hidden" name="anzahlVersuche" value="' + str(anzahlVersuche) + '">'
print '<input type="hidden" name="versuche" value="' + str(versuche) + '">'
print '</form>'

if anzahlVersuche > 0:
    print versuche