#! /usr/bin/python

print 'Content-type: text/html'
print ''
print 'Hello Wolrd'

print '<br>'
for i in range(5, 11):
    print i

print '<br>'
lieblingsessen = ["Pizza", "Lasagne", "Bageute"]

for essen in lieblingsessen:
    print "ich mag " + essen + "."

print '<br>'
alter = {}
alter["Shayan"] = 31
alter["Amir"] = 25
alter["Martin"] = 26
alter["Miki"] = 20

for alt in alter:
    print alt + " ist " + str(alter[alt]) + ".<br>"


x=0
while x <=10:
    print x
    x += 1

print '<br>'
name = "Shayan"

if name == "Shayan":
    print "Hallo " + name
else:
    print "Ich kenne dich nicht"

print '<br>'
primzahlen = 0
zahl = 2
while primzahlen < 50:
    prim = True
    for i in range(2, zahl):
        if zahl % i == 0:
            prim = False
            break


    if prim == True:
        print zahl
        primzahlen += 1

    zahl += 1

print '<br>'
def sageHallo(name):
    print "Hallo " + name

sageHallo("Shayan")


