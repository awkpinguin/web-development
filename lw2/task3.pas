PROGRAM HelloDear(INPUT, OUTPUT);
USES
  DOS;
BEGIN {HelloDear}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  IF POS('name', GetEnv('QUERY_STRING')) = 0
  THEN
    WRITELN('Hello Anonymous')
  ELSE
    IF POS('&', GetEnv('QUERY_STRING')) = 0
    THEN
      WRITELN('Hello dear ', COPY(GetEnv('QUERY_STRING'),
                      1 + POS('=', GetEnv('QUERY_STRING')), 60))
    ELSE
      WRITELN('Hello dear ', COPY(GetEnv('QUERY_STRING'),
                             1 + POS('=', GetEnv('QUERY_STRING')),
                             POS('&', GetEnv('QUERY_STRING')) - POS('=', GetEnv('QUERY_STRING')) - 1))
END. {HelloDear}

