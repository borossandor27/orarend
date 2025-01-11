# Órarendi változások nyilván tartása
Iskola rendszerű képzésben személyi vagy technikai változások esetén a változott órákat grafikusan meg kell jeneníteni és a tanulókat email-ben értesíteni.

# Esemény - ami miatt órarendet kell változtatni 
- Tanár lehet akadályoztatva az óra megtartásában. Betegség, továbbképzés, ...
- Technikai akadályok miatt (pl.: átalakítás, beázás, ablak kitörik, rendezvény, ...) termek válhatnak használhatatlanná 

# Egyedek
## Tanár
Az órákat adó tanárok adatai
```sql
Table tanar {
    tanarId integer [primary key, increment]
    nev varchar [not null]
    kod varchar [not null]
    email varchar
}
```
## Tantárgy
Az iskolában tanított tantárgyak
```sql
Table tantargy {
  tantargyId integer [primary key,increment]
  megnevezes varchar [not null]
  kod varchar [not null]
}
```
## Osztályok
Az iskolában lévő minden osztály és csoport, amelyeknek órarendi foglalkozást kell tartani
```sql
Table osztalyok {
  osztalyId integer [primary key, increment]
  evfolyam integer [null]
  megnevezes varchar
  csoport bool [default: true]
  osztalyfonokId integer 
}
```
## Tanulók
Az oktatásban szereplő tanulók
```sql
Table tanulo {
  tanuloId integer [primary key, increment]
  nev varchar [not null]
  email varchar [not null]
  megjegyzes varchar [default: null]
}
```

## Osztály
Az osztályban vagy oktatási csoportban szereplő tanulók összekapcsolása
```sql
table osztaly{
  tanuloId integer
  osztalyId integer
}
```
## Terem
Az oktatási célra felhasználható termek adatai
```sql
table terem{
  teremId integer [primary key, increment]
  kod varchar [not null]
  projektor bool [default: true]
  info bool [default: false]
  ferohely integer [default: null]
}
```

## Órák
Az iskolában tervezhető órák időpontjai
```sql
Table orak{
    oraszam integer 
    kezdes time 
    befejezes time
}
```

## Tanórák
Megtartani tervezett órák adatai
```sql
Table tanora{
  hetnapja integer
  oraszam integer
  tanarId integer
  teremId integer
  osztalyId integer
  tantargyId integer
}
```
## Esemény
A változást kiváltó esemény
```sql
Table esemeny {
  erintettTanarId integer [default: null]
  erintettTeremId integer [default:  null]
  kezdete time [not null]
  vege time  [not null]
}
```

# Kapcsolatok

- Ref: osztalyok.osztalyfonokId > tanar.tanarId
- Ref: osztaly.tanuloId > tanulo.tanuloId
- Ref: osztalyok.osztalyId > osztaly.osztalyId
- Ref: tanora.oraszam > orak.oraszam
- Ref: tanora.tanarId > tanar.tanarId
- Ref: tanora.teremId > terem.teremId
- Ref: tanora.osztalyId > osztalyok.osztalyId
- Ref: tanora.tantargyId > tantargy.tantargyId
- Ref: esemeny.erintettTanarId > tanar.tanarId
- Ref: esemeny.erintettTeremId > terem.teremId

