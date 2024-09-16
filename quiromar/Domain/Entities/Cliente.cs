using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Domain.Entities
{
    public class Cliente : BaseEntity
    {
        public string Nombre { get; set; }
        public string IdCliente { get; set; }
        public TipoPersona TipoPersona { get; set; }
        public int IdTipoPersonaFk { get; set; }
        public DateOnly FechaRegistro { get; set; }
        public Municipio Municipio { get; set; }
        public int IdMunicipioFk { get; set; }
        public ICollection<Orden> Ordenes { get; set; }
        public ICollection<Venta> Ventas { get; set; }
    }
}