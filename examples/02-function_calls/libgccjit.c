static long long
add (long long a, long long b)
{
main:
  return a + b;
}

extern long long
add2 (long long a, long long b)
{
main:
  return add (add (a, b), b);
}

