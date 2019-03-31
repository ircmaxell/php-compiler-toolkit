extern long long
add1or2 (long long shouldAdd1, long long a)
{
  long long ifTrue_arg_0;
  long long ifFalse_arg_0;

main:
  if (shouldAdd1 > (long long)0) goto main_if; else goto main_else;

ifTrue:
  return ifTrue_arg_0 + (long long)1;

ifFalse:
  return ifFalse_arg_0 + (long long)2;

main_if:
  ifTrue_arg_0 = a;
  goto ifTrue;

main_else:
  ifFalse_arg_0 = a;
  goto ifFalse;
}

