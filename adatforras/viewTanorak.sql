CREATE OR REPLACE VIEW tanorak AS
SELECT 
  t.tantargyId,
  t.oraszam,
  t.teremId,
  t.osztalyId,
  t.tanarId,
  ta.tanarnev,
  ta.tanarkod,
  ta.email,
  t.hetnapja,
  o.evfolyam,
  o.megnevezes,
  o.csoport,
  o.osztalyfonokId,
  r.teremkod,
  r.projektor,
  r.infotrerem,
  r.ferohely,
  tg.tantargyneve,
  tg.tantargykod
FROM 
  tanora t
JOIN tanar ta ON t.tanarId = ta.tanarId
JOIN osztalyok o ON t.osztalyId = o.osztalyId
JOIN terem r ON t.teremId = r.teremId
JOIN tantargy tg ON t.tantargyId = tg.tantargyId
WHERE t.hetnapja BETWEEN 1 AND 5
ORDER BY t.hetnapja, t.oraszam;
