PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  DOS;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  S: STRING;
BEGIN {GetQueryStringParameter}
  S := GetEnv('QUERY_STRING');
  IF COPY(S, POS(Key, S), LENGTH(Key)) = Key
  THEN
    BEGIN
      DELETE(S, 1, POS(Key, GetEnv('QUERY_STRING')) - 1);
      IF POS('&', S) = 0
      THEN
        GetQueryStringParameter := COPY(S, 1 + POS('=', S), 60)
      ELSE
        GetQueryStringParameter := COPY(S, 1 + POS('=', S), POS('&', S) - POS('=', S) - 1)
    END
  ELSE
    GetQueryStringParameter := ''
END; {GetQueryStringParameter}

BEGIN {WorkWithQueryString}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}


