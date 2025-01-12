CREATE OR REPLACE VIEW tanorak AS
SELECT 
  t.tantargyId,
  t.oraszam,
  t.teremId,
  t.osztalyId,
  t.tanarId,
  ta.nev,
  ta.kod,
  t.hetnapja,
  o.megnevezes,
  r.teremkod,
  orak.orakezdes,
  orak.oravege,
  tg.tantargyneve,
  tg.tantargykod
FROM 
  tanora t
JOIN tanar ta ON t.tanarId = ta.tanarId
JOIN osztalyok o ON t.osztalyId = o.osztalyId
JOIN terem r ON t.teremId = r.teremId
JOIN orak ON t.oraszam = orak.oraszam
JOIN tantargy tg ON t.tantargyId = tg.tantargyId
ORDER BY t.hetnapja, t.oraszam;
